match <- c('week', 'month', 'quarter')
file_dir <- paste('D:\\Ostat\\csv_data\\', match[3], '.csv', sep="")
df <- read.table(file_dir, header = TRUE, sep = '|', encoding = 'UTF-8')
df[is.na(df)] <- 0
View(df)

df_sort <- df[df$video == 1 & df$english == 0 & df$chemistry == 0, ]
print(nrow(df_sort))
View(df_sort)